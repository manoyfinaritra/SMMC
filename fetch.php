<?php
include('db_connection.php');
try {

	$stmt = $pdo->query("SELECT * FROM equipements");

	echo '<table id="table">';
	echo '<thead><tr><th>ID</th><th>Article</th><th>Date</th><th>Marque</th><th>Modèle</th><th>Processeur</th><th>RAM</th><th>État<span class="icon-arrow">&UpArrow;</span></th><th>Établissement</th><th>Actions</th></tr></thead>
    <tbody style="background-color: transparent;">';
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr>';
		foreach ($row as $key => $col) {
			echo "<td>{$col}</td>";
		}
		echo '<td>
                <button 
                class="btn btn-danger btn-sm delete-btn" data-id="' . $row['id'] . '">
                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 4px;" width="14" height="14" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg>
                </button>
                <button 
                class="btn btn-warning btn-sm edit-btn" data-id="' . $row['id'] . '" 
                data-bs-toggle="modal" data-bs-target="#editModal">
                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 4px;" width="14" height="14" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                </svg>
                </button>
              </td>';
		echo '</tr>';
	}
	echo '</tbody></table>';
} catch (PDOException $e) {
	echo "Erreur : " . $e->getMessage();
}