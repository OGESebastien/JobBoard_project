import React, { useState } from 'react';

const UserPage = () => {
  const [records, setRecords] = useState([
    { id: 1, name: 'John Doe', email: 'john@example.com' },
    { id: 2, name: 'Jane Smith', email: 'jane@example.com' }
  ]);

  const [newRecord, setNewRecord] = useState({ name: null, email: null });

  const handleAddRecord = () => {
    // Ajoute le nouvel enregistrement à la liste des enregistrements
    setRecords([...records, { ...newRecord, id: Date.now() }]);
    // Réinitialise les valeurs des champs "name" et "email" à null
    setNewRecord({ name: null, email: null });
  };

  const handleDeleteRecord = (id) => {
    setRecords(records.filter((record) => record.id !== id));
  };

  const handleEditRecord = (id, updatedRecord) => {
    setRecords(
      records.map((record) => (record.id === id ? { ...record, ...updatedRecord } : record))
    );
  };

  return (
    <div className="container mx-auto p-6">
      <h1 className="text-3xl font-bold mb-4">Database Monitoring</h1>

      {/* Table for displaying records */}
      <table className="table-auto w-full">
        <thead>
          <tr>
            <th className="px-4 py-2">ID</th>
            <th className="px-4 py-2">Name</th>
            <th className="px-4 py-2">Email</th>
            <th className="px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          {records.map((record) => (
            <tr key={record.id}>
              <td className="border px-4 py-2">{record.id}</td>
              <td className="border px-4 py-2">{record.name}</td>
              <td className="border px-4 py-2">{record.email}</td>
              <td className="border px-4 py-2">
                <button
                  className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                  onClick={() => handleEditRecord(record.id, { name: 'Updated Name' })}
                >
                  Edit
                </button>
                <button
                  className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                  onClick={() => handleDeleteRecord(record.id)}
                >
                  Delete
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {/* Form for creating records */}
      <div className="mt-4">
        <label className="block font-bold mb-2" htmlFor="name">
          Name:
        </label>
        <input
          className="w-full p-2 border rounded"
          type="text"
          id="name"
          name="name"
          value={newRecord.name}
          onChange={(e) => setNewRecord({ ...newRecord, name: e.target.value })}
          required
        />
      </div>
      <div className="mt-4">
        <label className="block font-bold mb-2" htmlFor="email">
          Email:
        </label>
        <input
          className="w-full p-2 border rounded"
          type="text"
          id="email"
          name="email"
          required
          value={newRecord.email}
          onChange={(e) => setNewRecord({ ...newRecord, email: e.target.value })}
        />
      </div>
      <button
        className="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
        onClick={handleAddRecord}
      >
        Add
      </button>
    </div>
  );
};

export default UserPage;
