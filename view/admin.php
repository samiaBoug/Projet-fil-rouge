<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calculatorCarbone";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

function getUtilisateurs($conn) {
    $sql = "SELECT * FROM utilisateur";
    return $conn->query($sql);
}

function getMessages($conn) {
    $sql = "SELECT * FROM message";
    return $conn->query($sql);
}

function getCategories($conn) {
    $sql = "SELECT * FROM categorie";
    return $conn->query($sql);
}

function getActivites($conn) {
    $sql = "SELECT * FROM activite";
    return $conn->query($sql);
}

function ajouterCategorie($conn, $nom, $description) {
    $sql = "INSERT INTO categorie (nomCategorie, descriptionCategorie) VALUES ('$nom', '$description')";
    return $conn->query($sql);
}

function modifierCategorie($conn, $id, $nom, $description) {
    $sql = "UPDATE categorie SET nomCategorie='$nom', descriptionCategorie='$description' WHERE idCategorie=$id";
    return $conn->query($sql);
}

function ajouterActivite($conn, $nom, $facteur, $unite, $idCategorie) {
    $sql = "INSERT INTO activite (nomActivite, facteurActivite, unite, idCategorie) VALUES ('$nom', $facteur, '$unite', $idCategorie)";
    return $conn->query($sql);
}

function modifierActivite($conn, $id, $nom, $facteur, $unite, $idCategorie) {
    $sql = "UPDATE activite SET nomActivite='$nom', facteurActivite=$facteur, unite='$unite', idCategorie=$idCategorie WHERE idActivite=$id";
    return $conn->query($sql);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouterCategorie'])) {
        ajouterCategorie($conn, $_POST['nomCategorie'], $_POST['descriptionCategorie']);
    } elseif (isset($_POST['modifierCategorie'])) {
        modifierCategorie($conn, $_POST['idCategorie'], $_POST['nomCategorie'], $_POST['descriptionCategorie']);
    } elseif (isset($_POST['ajouterActivite'])) {
        ajouterActivite($conn, $_POST['nomActivite'], $_POST['facteurActivite'], $_POST['unite'], $_POST['idCategorie']);
    } elseif (isset($_POST['modifierActivite'])) {
        modifierActivite($conn, $_POST['idActivite'], $_POST['nomActivite'], $_POST['facteurActivite'], $_POST['unite'], $_POST['idCategorie']);
    }
}

$utilisateurs = getUtilisateurs($conn);
$messages = getMessages($conn);
$categories = getCategories($conn);
$activites = getActivites($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
</head>
<body>
    <h1>Page d'administration</h1>
    
    <h2>Utilisateurs</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
        <?php while($utilisateur = $utilisateurs->fetch_assoc()): ?>
            <tr>
                <td><?php echo $utilisateur['idUtilis']; ?></td>
                <td><?php echo $utilisateur['nomUtilis']; ?></td>
                <td><?php echo $utilisateur['prenomUtilis']; ?></td>
                <td><?php echo $utilisateur['emailUtilis']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    
    <h2>Messages</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        <?php while($message = $messages->fetch_assoc()): ?>
            <tr>
                <td><?php echo $message['idMessage']; ?></td>
                <td><?php echo $message['dateMessage']; ?></td>
                <td><?php echo $message['nomVisiteur']; ?></td>
                <td><?php echo $message['emailVisiteur']; ?></td>
                <td><?php echo $message['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Catégories</h2>
    <form method="POST">
        <input type="hidden" name="idCategorie" value="">
        <input type="text" name="nomCategorie" placeholder="Nom de la catégorie">
        <input type="text" name="descriptionCategorie" placeholder="Description de la catégorie">
        <button type="submit" name="ajouterCategorie">Ajouter Catégorie</button>
        <button type="submit" name="modifierCategorie">Modifier Catégorie</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
        </tr>
        <?php while($categorie = $categories->fetch_assoc()): ?>
            <tr>
                <td><?php echo $categorie['idCategorie']; ?></td>
                <td><?php echo $categorie['nomCategorie']; ?></td>
                <td><?php echo $categorie['descriptionCategorie']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Activités</h2>
    <form method="POST">
        <input type="hidden" name="idActivite" value="">
        <input type="text" name="nomActivite" placeholder="Nom de l'activité">
        <input type="text" name="facteurActivite" placeholder="Facteur de l'activité">
        <input type="text" name="unite" placeholder="Unité">
        <select name="idCategorie">
            <?php while($categorie = $categories->fetch_assoc()): ?>
                <option value="<?php echo $categorie['idCategorie']; ?>"><?php echo $categorie['nomCategorie']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit" name="ajouterActivite">Ajouter Activité</button>
        <button type="submit" name="modifierActivite">Modifier Activité</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Facteur</th>
            <th>Unité</th>
            <th>Catégorie</th>
        </tr>
        <?php while($activite = $activites->fetch_assoc()): ?>
            <tr>
                <td><?php echo $activite['idActivite']; ?></td>
                <td><?php echo $activite['nomActivite']; ?></td>
                <td><?php echo $activite['facteurActivite']; ?></td>
                <td><?php echo $activite['unite']; ?></td>
                <td><?php echo $activite['idCategorie']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
