document.addEventListener('DOMContentLoaded', () =>
    {
        const bcrypt = require('bcrypt');
        const salt_rounds = 10;

        const password = 'admin';

        bcrypt.hash(password, salt_rounds, functions(err, hash))
        {

        }
    }
)