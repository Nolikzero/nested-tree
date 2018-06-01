import axios from 'axios';

export function getAxios() {

    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.headers.common['Content-type'] = 'application/json';

    return axios;
};