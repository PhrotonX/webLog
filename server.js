const express = require('express');
const connection = require('connection');

const app = express();
app.use(express.json());

app.get('/profile/picture', (req, res) => {
    const userId = req.params.user_id;

    var query = "SELECT * FROM account_profile_pictures WHERE account_id = " + userId;
    
    connection.query(query, (error, results) => {
        
    });
});

