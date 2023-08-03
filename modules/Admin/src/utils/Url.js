const baseUrl = import.meta.env.VITE_FILE_HOST ? import.meta.env.VITE_FILE_HOST : ''
export function url(path) {
  return baseUrl + '/' + path
}
