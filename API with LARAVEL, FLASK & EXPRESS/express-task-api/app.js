const express = require('express');
const taskRoutes = require('./routes/taskRoutes');
require('dotenv').config();

const app = express();

// Middleware untuk parsing JSON
app.use(express.json());

// Tambahkan prefix /express_task_api untuk semua rute
app.use('/express_task_api', taskRoutes);

// Error handling middleware (opsional)
app.use((err, req, res, next) => {
    console.error(err.stack);
    res.status(500).json({ error: 'Something went wrong!' });
});

// Jalankan server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});