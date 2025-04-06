<template>
    <h1>Dashboard Finance</h1>

    <div class="form-container">
        <h2>Add/Edit Transaction</h2>
        <form @submit.prevent="saveFinance">
            <input type="hidden" v-model="form.id">

            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" v-model="form.date" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <input type="text" id="description" v-model="form.description" required>
            </div>

            <div>
                <label for="type">Type:</label>
                <select id="type" v-model="form.type" required>
                    <option value="income">Income</option>
                    <option value="expenses">Expenses</option>
                </select>
            </div>

            <div>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" v-model="form.amount" required min="0.01" step="0.01">
            </div>

            <button type="submit">{{ form.id ? 'Save' : 'Add' }}</button>
            <button type="button" @click="resetForm">Cancel</button>
        </form>
    </div>

    <div class="list-container">
        <h2>Transaction List</h2>
        <div v-if="loading">Loading...</div>
        <div v-else-if="error">{{ error }}</div>
        <table v-else class="transaction-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in finances" :key="item.id">
                    <td>{{ formatDate(item.date) }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.type }}</td>
                    <td>{{ formatCurrency(item.amount) }}</td>
                    <td>
                        <button @click="editFinance(item)">Edit</button>
                        <button @click="deleteFinance(item.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p v-if="!finances.length && !loading">There is no transaction.</p>
    </div>
</template>

<script setup>
import { ref, onMounted, inject } from 'vue';
import axios from 'axios';
import '../style.css';

const finances = ref([]);
const loading = ref(false);
const error = ref(null);
const form = ref({
    id: null,
    date: '',
    description: '',
    type: 'income',
    amount: null,
});

const $axios = inject('$axios');

const fetchFinances = async () => {
    loading.value = true;
    error.value = null;
    try {
        const response = await $axios.get('/finance');
        finances.value = response.data;
    } catch (err) {
        error.value = 'Failed to fetch financial data.';
        console.error(err);
    } finally {
        loading.value = false;
    }
};

const saveFinance = async () => {
    try {
        if (form.value.id) {
            await $axios.put(`/finance/${form.value.id}`, form.value);
            alert('Transaction updated successfully.');
        } else {
            await $axios.post('/finance', form.value);
            alert('Transaction created successfully.');
        }
        resetForm();
        fetchFinances();
    } catch (err) {
        alert(err.response?.data?.message || 'An error occurred while saving the transaction.');
        console.error(err.response?.data?.errors || err);
    }
};

const editFinance = (item) => {
    form.value = { ...item };
};

const deleteFinance = async (id) => {
    if (confirm('Are you sure to delete this transaction?')) {
        try {
            await $axios.delete(`/finance/${id}`);
            finances.value = finances.value.filter(item => item.id !== id); // Koreksi: menggunakan finances
            alert('Transaction deleted successfully.');
        } catch (err) {
            alert(err.response?.data?.message || 'An error occurred while deleting the transaction.');
            console.error(err);
        }
    }
};

const resetForm = () => {
    form.value = {
        id: null,
        date: '',
        description: '',
        type: 'income',
        amount: null,
    };
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString();
};

const formatCurrency = (amount) => {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
};

onMounted(() => {
    fetchFinances();
});
</script>