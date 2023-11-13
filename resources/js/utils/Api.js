import axios from 'axios'
import {message} from 'ant-design-vue';
const Api = axios.create({
  baseURL: '/',
  withCredentials: true
})
let key = 'request_updatable';
let requestConfig = null;
let hideMessage = null;

Api.interceptors.request.use(function (config) {
  // Do something before request is sent
  requestConfig = config

  return config;
}, function (error) {
  // Do something with request error
  return Promise.reject(error);
});

Api.interceptors.response.use((response) => {

  return response;
}, (error) => {
  message.error({content: error.response?.data?.message || 'Error!', key, duration: 1});
  if (error.response.status == 401) {
    useAuthStore().logout()
  }
  return Promise.reject(error);
});
export default Api
