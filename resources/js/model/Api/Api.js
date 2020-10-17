import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:8080",
  headers: {
    "X-Requested-With": "XMLHttpRequest",
    'Content-Type': 'application/json',
  }
});

api.defaults.withCredentials = true;

export default api;
