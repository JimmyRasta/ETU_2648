<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des Cueillettes</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="ajax.js"></script>
</head>

<body>
    <header>
        <h1>Saisie des Cueillettes</h1>
    </header>

    <main>
        <form id="saisieForm">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>

            <label for="cueilleur">Cueilleur :</label>
            <select id="cueilleur" name="cueilleur" required>
                <!-- Options pour les cueilleurs -->
                <option value="cueilleur1">Cueilleur 1</option>
                <option value="cueilleur2">Cueilleur 2</option>
                <!-- Ajoutez d'autres cueilleurs si nécessaire -->
            </select>

            <label for="parcelle">Parcelle :</label>
            <input type="text" id="parcelle" name="parcelle" required>

            <label for="poids">Poids cueilli (en kg) :</label>
            <input type="number" id="poids" name="poids" step="0.01" required>

            <button type="button" onclick="submitForm()">Valider</button>
        </form>

        <div id="result"></div>
    </main>

    <footer>
        <!-- Ajoutez des informations de pied de page si nécessaire -->
    </footer>
</body>

</html>
