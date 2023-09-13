const baseUrl = import.meta.env.VITE_FILE_HOST ? import.meta.env.VITE_FILE_HOST : ''
export function url(path) {
  if(!path){
    return '--'
  }
  return baseUrl + '/' + path
}
