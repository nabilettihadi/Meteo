<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .form-bg {
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            height: 70vh; /* Ajustez la hauteur selon vos besoins */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .result-bg {
            background-image: linear-gradient(120deg, #ffdde1 0%, #ee9ca7 100%);
            height: 70vh; /* Ajustez la hauteur selon vos besoins */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .weather-card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px; /* Ajustez la largeur selon vos besoins */
        }

        .weather-icon {
            font-size: 6rem;
        }

        .weather-heading {
            font-size: 2rem;
        }

        /* Animation styles */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Additional icon styles */
        .sun-icon {
            color: #FFD700; /* Gold color for the sun icon */
        }

        .cloud-icon {
            color: #CCCCCC; /* Light gray color for the cloud icon */
        }

        .rain-icon {
            color: #6495ED; /* Cornflower blue color for the rain icon */
        }

        .snow-icon {
            color: #FFFFFF; /* White color for the snow icon */
        }

        /* Additional icons for humidity and wind speed */
        .humidity-icon {
            font-size: 6rem; /* Same size as the temperature icon */
        }

        .wind-icon {
            font-size: 6rem; /* Same size as the temperature icon */
        }
    </style>
</head>

<body>
    <div class="form-bg">
        <div class="weather-card">
            <h1 class="weather-heading text-center text-gray-800 mb-4">Météo</h1>
            <form action="{{ route('weather.get') }}" method="GET" class="mb-4">
                <input type="text" name="city" placeholder="Entrez une ville"
                    class="border border-gray-300 rounded-md p-2 w-full text-gray-700" required>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2 w-full mt-4">Obtenir la
                    météo</button>
            </form>
            @if ($errors->any())
            <div class="mt-6 bg-red-200 p-4 rounded-md">
                @foreach ($errors->all() as $error)
                <p class="text-red-700">{{ $error }}</p>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <div class="result-bg">
        @isset($weatherData)
        <div class="weather-card text-center fade-in">
            <h2 class="text-2xl font-bold text-gray-800">{{ $weatherData['name'] }}</h2>
            <p class="text-lg text-gray-700">{{ $weatherData['weather'][0]['description'] }}</p>
            <div class="flex items-center justify-center mt-4">
                <div class="mr-4">
                    <p class="text-xl font-bold text-gray-800">{{ $weatherData['main']['temp'] }} °C</p>
                    <div class="weather-icon text-blue-500">
                        @if ($weatherData['weather'][0]['main'] === 'Clear')
                        <span class="sun-icon">☀️</span>
                        @elseif ($weatherData['weather'][0]['main'] === 'Clouds')
                        <span class="cloud-icon">☁️</span>
                        @elseif ($weatherData['weather'][0]['main'] === 'Rain')
                        <span class="rain-icon">🌧️</span>
                        @elseif ($weatherData['weather'][0]['main'] === 'Snow')
                        <span class="snow-icon">❄️</span>
                        @else
                        {{$weatherData['weather'][0]['main']}}
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">Temérature</p>
                </div>
                <div class="mr-4">
                    <p class="text-xl font-bold text-gray-800">{{ $weatherData['main']['humidity'] }}%</p>
                    <div class="humidity-icon">
                        @if ($weatherData['main']['humidity'] >= 70)
                        <span>☔️</span> <!-- Pluie pour une humidité élevée -->
                        @elseif ($weatherData['main']['humidity'] >= 40)
                        <span>💧</span> <!-- Gouttes d'eau pour une humidité moyenne -->
                        @else
                        <span>💨</span> <!-- Vent pour une humidité faible -->
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">Humidité</p>
                </div>
                <div>
                    <p class="text-xl font-bold text-gray-800">{{ $weatherData['wind']['speed'] }} m/s</p>
                    <div class="wind-icon">
                        @if ($weatherData['wind']['speed'] >= 5)
                        <span>🌀</span> <!-- Ouragan pour une vitesse élevée -->
                        @elseif ($weatherData['wind']['speed'] >= 2)
                        <span>🌬️</span> <!-- Vent fort pour une vitesse moyenne -->
                        @else
                        <span>🍃</span> <!-- Brise pour une vitesse faible -->
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">Vitesse du vent</p>
                </div>
            </div>
        </div>
        @endisset
    </div>
</body>

</html>
