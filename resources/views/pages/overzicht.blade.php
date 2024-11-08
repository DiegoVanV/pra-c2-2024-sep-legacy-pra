<x-layouts.app>

    <h1>Overzicht Merken</h1>
    <div class="container">
        <!-- Voeg een margin-bottom toe aan de knop om ruimte te creëren tussen de knop en de lijst -->
        <button id="toggle-brands" class="btn btn-primary" style="margin-bottom: 20px;">Toon Alle Merken</button>

        <!-- Grid layout voor de merkenlijst -->
        <ul id="brands-list" class="brand-grid">
            @foreach($brands as $brand)
                <li class="brand-item" style="display: none;"> <!-- Verberg merken in eerste instantie -->
                    <a href="#" class="brand-link" data-id="{{ $brand->id }}">{{ $brand->name }}</a>
                </li>
            @endforeach
        </ul>

        <div id="models-container" style="display: none;">
            <h2>Modellen</h2>
            <ul id="models-list"></ul>
        </div>
    </div>

    <style>
        /* Maak een grid met 2 kolommen op kleine schermen, 3 kolommen op medium en 4 op grote schermen */
        .brand-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem; /* Ruimte tussen de items */
            list-style-type: none;
            padding: 0;
        }

        .brand-item {
            background-color: #f8f9fa; /* Achtergrondkleur voor de items */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
        }

        .brand-item a {
            text-decoration: none;
            color: #007bff;
        }

        .brand-item a:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        // Variabele om bij te houden of de merken zichtbaar zijn of niet
        let brandsVisible = false;

        // Event listener voor de knop
        document.getElementById('toggle-brands').addEventListener('click', function() {
            const brandItems = document.querySelectorAll('.brand-item');
            brandsVisible = !brandsVisible; // Toggle de zichtbaarheid status

            // Toon of verberg de merken op basis van de status
            brandItems.forEach(item => {
                item.style.display = brandsVisible ? 'list-item' : 'none';
            });

            // Update de knop tekst op basis van de zichtbaarheid
            this.textContent = brandsVisible ? 'Verberg Merken' : 'Toon Alle Merken';
        });

        // Event listener voor de merken
        document.querySelectorAll('.brand-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Voorkom standaard link gedrag

                const brandId = this.getAttribute('data-id');
                fetch(`/brands/${brandId}/models`)
                    .then(response => response.json())
                    .then(data => {
                        const modelsList = document.getElementById('models-list');
                        modelsList.innerHTML = ''; // Leeg de huidige modellenlijst

                        // Vul de modellenlijst met de ontvangen modellen
                        data.models.forEach(model => {
                            const li = document.createElement('li');
                            li.textContent = model.name; // Of een link indien nodig
                            modelsList.appendChild(li);
                        });

                        // Toon de modellencontainer
                        document.getElementById('models-container').style.display = 'block';
                    });
            });
        });
    </script>

</x-layouts.app>
