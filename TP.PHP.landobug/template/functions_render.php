<?php

// Execute the Python script to retrieve database content
$command = escapeshellcmd('../SqlAlchemy/main.py');
$output = shell_exec($command);

// Render the retrieved data using PHP rendering functions
echo $output;
?>








