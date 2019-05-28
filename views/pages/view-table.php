<table>
    <thead>
        <tr>
            <th><input type="checkbox" /></th>
            <th><i class="fas fa-id-card-alt"></i> Nr.</th>
            <th> <i class="fas fa-file-signature"></i> Nume</th>
            <th><i class="fab fa-typo3"></i> Extensie</th>
            <th><i class="fas fa-expand"></i> Marime</th>
            <th><i class="fas fa-file-code"></i> Tip</th>
            <th><i class="far fa-folder-open"></i> Nume Director</th>
            <th>
                <i class="fas fa-share-alt"></i> Distribuie
            </th>
            <th>
                <i class="fas fa-download"></i> Descarca
            </th>
            <th>
                <i class="fas fa-trash-alt"></i> Sterge
            </th>
            <th>
                <i class="fas fa-edit"></i> Modifica
            </th>
        </tr>
    </thead>
    <tbody>
        <?php

if (count($allFiles) === 0) {
    echo '<tr><span class="popup-container popupSpecialType1"><img src="https://cdn.dribbble.com/users/37530/screenshots/2485318/no-results.png"> Momentan nu sunt fisiere disponibile...</span></tr>';
}
$i = 0;
echo '<tbody>';
foreach ($allFiles as $file) {
    $i++;

    echo
    '
    <tr>
        <td><input type="checkbox" /></td>
        <td>' . $i . '</td>
        <td>' . $file['name'] . '</td>
        <td>' . $file['ext'] . '</td>
        <td>' . FouController::formatSizeUnits($file['size']) . '</td>
        <td>' . $file['type'] . '</td>
        <td>' . $file['folderName'] . '</td>
        <td>
            <a

                href="?shareFile=' . $file['token'] . '"
            >
            <button class="app button special blue">
                <i class="fas fa-share"></i>
            </button>
            </a>
        </td>
        <td>
            <a
                download="' . $file['name'] . $file['ext'] . '"
                href="' . $file['path'] . '"
                id="linkToCopy' . $i . '"
            >
                <button class="app button special green">
                    <i class="fas fa-download"></i>
                </button>
            </a>
        </td>
        <td>
            <a href="?deletePopup=true&file=' . $file['token'] . '">
                <button class="app button special red">
                    <i class="fas fa-minus-circle"></i>
                </button>
            </a>
        </td>
        <td>
            <a href="?editPopup=true&file=' . $file['token'] . '">
                <button class="app button special ">
                    <i  class="fas fa-pen"></i>
                </button>
            </a>
        </td>

    </tr>
    ';
}
echo ' </tbody>';
?>


</table>