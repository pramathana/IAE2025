const { Sequelize, DataTypes } = require('sequelize');
const sequelize = require('../config/database');

const Task = sequelize.define('Task', {
    title: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    description: {
        type: DataTypes.TEXT,
        allowNull: true,
    },
    is_completed: {
        type: DataTypes.BOOLEAN,
        defaultValue: false,
    },
});

// Sinkronkan model dengan database
(async () => {
    await sequelize.sync({ alter: true }); // Gunakan alter untuk update tabel jika ada perubahan
})();

module.exports = Task;