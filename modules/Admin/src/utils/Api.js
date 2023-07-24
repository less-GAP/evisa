import axios from 'axios'
import {useAuthStore} from "@/stores/auth";
const Api = axios.create({
 baseURL : import.meta.env.VITE_API_HOST+'/api/',
  withCredentials : true
})
Api.interceptors.response.use((response) => {
  return response;
}, (error) => {
  if(error.response.status == 401){
    useAuthStore().logout()
  }
  return Promise.resolve({ error });
});
export default Api
