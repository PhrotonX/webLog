const express = require('express');
const connection = require('connection');

const app = express();
app.use(express.json());

app.post('/profile/picture', (req, res) => {
    const userId = req.params.user_id;

    var query = "SELECT * FROM account_profile_pictures WHERE account_id = " + userId;
    
    connection.query(query, (error, results) => {
        if(error){
            console.error('Database querry error: ', error);
            return res.status(500).json({error: 'Internal Server Error'});
        }
        res.json(results);
    });
});

const PORT = process.env.PORT || 300;
app.listen(PORT, () => {
    console.log('Server running on port {$PORT}');
})

