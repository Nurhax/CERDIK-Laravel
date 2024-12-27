import express from 'express';
import fs from 'fs';
import path from 'path';
import mysql from 'mysql2';
import multer from 'multer';
import cors from 'cors';

const app = express();
const port = 3001;

app.use(express.static('public'));

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
      cb(null, 'public/uploads'); 
  },
  filename: (req, file, cb) => {
      cb(null, `${Date.now()}-${file.originalname}`);
  }
});
const upload = multer({ storage });

app.use(cors());

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',  
  database: 'cerdikweb' 
});

const JSON_FILE = path.resolve('public/js/adminScripts/mitra.json');


app.get('/api/refresh-mitra', (req, res) => {
  connection.query('SELECT * FROM mitras', (err, results) => {
    if (err) {
      console.error('Error fetching data from the database:', err);
      return res.status(500).json({ message: 'Error fetching data' });
    }

    const mitraData = { mitra: results };

    fs.writeFile(JSON_FILE, JSON.stringify(mitraData, null, 2), (err) => {
      if (err) {
        console.error('Error writing to JSON file:', err);
        return res.status(500).json({ message: 'Error writing to JSON file' });
      }
      console.log('mitra.json updated successfully!');
      return res.status(200).json({ message: 'mitra.json updated successfully', mitraData });
    });
  });
});

app.delete('/api/delete-mitra/:id', (req, res) => {
  const mitraId = req.params.id;
   connection.query('SELECT logo FROM mitras WHERE id = ?', [mitraId], (err, results) => {
    if (err) {
      console.error('Error fetching mitra logo:', err);
      return res.status(500).json({ message: 'Error fetching mitra' });
    }

    if (results.length === 0) {
      return res.status(404).json({ message: 'Mitra not found' });
    }

    const logoPath = results[0].logo ? path.join('public', results[0].logo) : null;

    connection.query('DELETE FROM mitras WHERE id = ?', [mitraId], (err) => {
      if (err) {
        console.error('Error deleting mitra from the database:', err);
        return res.status(500).json({ message: 'Error deleting mitra' });
      }

     
      if (logoPath && fs.existsSync(logoPath)) {
        fs.unlink(logoPath, (err) => {
          if (err) {
            console.error('Error deleting logo file:', err);
          }
        });
      }

      console.log('Mitra deleted successfully');
      return res.status(200).json({ message: 'Mitra deleted successfully' });
    });
  });
});

app.post('/api/update-mitra/:id', upload.single('logo'), (req, res) => {
  const mitraId = req.params.id;
  const { namaMitra, sejak, link } = req.body;
  const logo = req.file ? `/uploads/${req.file.filename}` : null;

  connection.query('SELECT logo FROM mitras WHERE id = ?', [mitraId], (err, results) => {
    if (err) {
      console.error('Error fetching mitra:', err);
      return res.status(500).json({ message: 'Error fetching mitra' });
    }

    if (results.length === 0) {
      return res.status(404).json({ message: 'Mitra not found' });
    }

    const oldLogoPath = results[0].logo ? path.join('public', results[0].logo) : null;

  const query = `
      UPDATE mitras 
      SET namaMitra = ?, sejak = ?, link = ?, logo = COALESCE(?, logo) 
      WHERE id = ?
    `;
    const values = [namaMitra, sejak, link, logo, mitraId];

    connection.query(query, values, (err) => {
      if (err) {
        console.error('Error updating mitra in the database:', err);
        return res.status(500).json({ message: 'Error updating mitra' });
      }

      if (logo && oldLogoPath && fs.existsSync(oldLogoPath)) {
        fs.unlink(oldLogoPath, (err) => {
          if (err) {
            console.error('Error deleting old logo file:', err);
          }
        });
      }

      console.log('Mitra updated successfully');
      return res.status(200).json({ message: 'Mitra updated successfully' });
    });
  });
});


app.post('/api/add-mitra', upload.single('logo'), (req, res) => {
  const { namaMitra, sejak, link } = req.body;
  const logo = req.file ? `/uploads/${req.file.filename}` : null;

  const query = 'INSERT INTO mitras (namaMitra, sejak, link, logo) VALUES (?, ?, ?, ?)';
  const values = [namaMitra, sejak, link, logo];

  connection.query(query, values, (err, result) => {
    if (err) {
      console.error('Error inserting data into database:', err);
      return res.status(500).json({ message: 'Error inserting data' });
    }

    console.log('New mitra added:', result);
    return res.status(201).json({ message: 'Mitra added successfully', mitraId: result.insertId });
  });
});



app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});
