<script>
import axios from 'axios';

export default {
    data() {
        return {
            city: '',
            weatherData: null
        };
    },
    methods: {
    fetchWeather() {
        axios.post('/get-weather', { city: this.city })
            .then(response => {
                this.weatherData = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    }
}
};
</script>
