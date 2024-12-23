const express = require('express');
const cors = require('cors');
const mysql = require('mysql2');

const API = express();

API.use(express.json());
API.use(cors());

//Koneksi dulu ke database SQL terus minta seluruh data obat buat nanti di tampilin
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'cerdikweb'
});

db.connect((err) =>{
    if(err){
        console.error('Gagal koneksi database:', err.message);
    }else{
        console.log('Berhasil terkoneksi ke database');
    }
})


//Dari hasil database pindahin ke array, jadiin json lewat api ini
API.get('/obat', (req,res) => {
    db.query('SELECT * FROM obat', (err, results) =>{
        if(err) return res.status(500).send(err.message);
        res.json(results);
    })
});

//Insert API
//Dari json requestnya dijadiin parameter buat insertnyah
API.post('/obat', (req,res) =>{
    const{nama_obat, deskripsi, url_gambar} = req.body;
    const query = 'INSERT INTO obat (nama_obat, deskripsi, url_gambar) VALUES (?, ?, ?)';
    db.query(query, [nama_obat, deskripsi, url_gambar], (err,result) =>{
        if (err) return res.status(500).send(err.message);
        res.status(201).json({id: result.insertID, nama_obat, deskripsi, url_gambar});
    });
});

//EditAPI
API.put('/obat/:id', (req,res) =>{
    const {id} = req.params;
    const {nama_obat, deskripsi, url_gambar} = req.body;
    const query = 'UPDATE obat SET nama_obat = ?, deskripsi = ? , url_gambar = ? WHERE id = ?';
    db.query(query, [nama_obat,deskripsi,url_gambar,id], (err,result)=>{
        if(err) return res.status(500).send(err.message);
        if(result.affectedRows === 0) return res.status(404).send('Obat tidak ditemukan!');
        res.json({id, nama_obat, deskripsi, url_gambar});
    });
    //isi details obat
});

//Delete API

API.delete('/obat/:id', (req,res) =>{
    const {id} = req.params;
    const query = 'DELETE FROM obat WHERE id = ?';
    db.query(query, [id], (err,result) =>{
        if(err) return res.status(500).send(err.message);
        if(result.affectedRows === 0) return res.status(404).send('Obat tidak ditemukan!');
        res.status(204).send();
    });
});

API.listen(3000, () => console.log('Server running on http://localhost:3000'));


   



