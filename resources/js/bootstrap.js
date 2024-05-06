import Alpine from "alpinejs";
import axios from "axios";

Alpine.start();

window.Alpine = Alpine;
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
