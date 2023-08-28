import type { AxiosInstance, AxiosRequestConfig } from 'axios';
import axios from 'axios';

const config: AxiosRequestConfig = {
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
  },
};

export const fetchApi: AxiosInstance = axios.create(config);

