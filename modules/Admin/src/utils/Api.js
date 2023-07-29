import axios from 'axios'
import {useAuthStore} from "@/stores/auth";
import {message} from 'ant-design-vue';

const Api = axios.create({
  baseURL: import.meta.env.VITE_API_HOST + '/api/',
  withCredentials: true
})
const key = 'request_updatable';
let requestConfig = null;
let hideMessage = null;

Api.interceptors.request.use(function (config) {
  // Do something before request is sent
  requestConfig = config
  if (requestConfig.method.toLowerCase() == 'post' || requestConfig.method.toLowerCase() == 'put') {
    message.loading({content: 'Submit...', key});
  }
  if (requestConfig.method.toLowerCase() == 'get' ) {
    hideMessage =   message.loading({content: 'Loading...', key, duration: 10});
  }
  return config;
}, function (error) {
  // Do something with request error
  return Promise.reject(error);
});

Api.interceptors.response.use((response) => {
  if (requestConfig.method.toLowerCase() == 'post' || requestConfig.method.toLowerCase() == 'put' || requestConfig.method.toLowerCase() == 'delete') {
    message.success({content: 'Success!', key, duration: 1});
  }
  if (requestConfig.method.toLowerCase() == 'get' ) {
    hideMessage()
  }
  return response;
}, (error) => {
  message.error({content: 'Error!', key, duration: 1});
  if (error.response.status == 401) {
    useAuthStore().logout()
  }
  return Promise.reject(error);
});
export default Api
