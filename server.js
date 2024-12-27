const express = require('express');
const connection = require('./connection');
const cors = require('cors');

const app = express();
app.use(cors);
app.use(express.json());

app.get('/api/user/image/list', (req, res) => {
    //const userId = req.params.user_id;

    var query = "SELECT * FROM account_profile_pictures";

    console.log(query);
    
    connection.query(query, (error, results) => {
        if(error){
            console.error('Database query error: ', error);
            return res.status(500).json({error: 'Internal Server Error'});
        }
        res.json(results);
    });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
