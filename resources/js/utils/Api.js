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
  if (requestConfig.method.toLowerCase() == 'post' || requestConfig.method.toLowerCase() == 'put') {
    message.loading({content: 'Submit...', key, duration: 1});
  }
  if (requestConfig.method.toLowerCase() == 'get') {
    hideMessage = message.loading({content: 'Loading...', key, duration: 10});
  }
  return config;
}, function (error) {
  // Do something with request error
  return Promise.reject(error);
});

Api.interceptors.response.use((response) => {
  if (response?.data?.message && (requestConfig.method.toLowerCase() == 'post' || requestConfig.method.toLowerCase() == 'put')) {
    message.success({content: response?.data?.message,key, duration: 1});
  }
  if (requestConfig.method.toLowerCase() == 'delete')
  {
    message.info({content: response?.data?.message,key, duration: 1});
  }
  if (requestConfig.method.toLowerCase() == 'get') {
    hideMessage()
  }
  return response;
}, (error) => {
  message.error({content: error.response?.data?.message || 'Error!', key, duration: 1});
  if (error.response.status == 401) {
    useAuthStore().logout()
  }
  return Promise.reject(error);
});
export default Api
