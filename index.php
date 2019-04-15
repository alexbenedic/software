<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql1 = "truncate `dump_soft`";
$result = $conn->query($sql1);

$sql = "SELECT id FROM `glpi_groups`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $group[]= $row['id'];
    }
} else {
    echo "0 results";
}
foreach ($group as $i)
{
    $sql = "SELECT DISTINCT `glpi_softwares`.`id` AS id, 'mbbastios' AS currentuser,
                        `glpi_computers`.`groups_id`, `glpi_softwares`.`is_recursive`,  `glpi_softwares`.`name` AS `ITEM_0`,
                        `glpi_softwares`.`id` AS `ITEM_0_id`,
                        `glpi_entities`.`completename` AS `ITEM_1`,  `glpi_manufacturers`.`name` AS `ITEM_2`,   GROUP_CONCAT(DISTINCT CONCAT(IFNULL(`glpi_softwareversions`.`name`, '__NULL__')
                                               ) SEPARATOR '<br>')
                              AS `ITEM_3`,

                   GROUP_CONCAT(DISTINCT CONCAT(IFNULL(`glpi_operatingsystems_0a35c270152be19b5c8a485502badcd7`.`name`, '__NULL__'),
                                               '$#$',`glpi_operatingsystems_0a35c270152be19b5c8a485502badcd7`.`id`) SEPARATOR '$$##$$')
                              AS `ITEM_4`,

                   COUNT(DISTINCT `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`.`id`) AS `ITEM_5`,
                      FLOOR(SUM(`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`number`)
                              * COUNT(DISTINCT `glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`id`)
                              / COUNT(`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`id`)) AS `ITEM_6`,
                        MIN(`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`number`) AS `ITEM_6_min`,
                          GROUP_CONCAT(DISTINCT CONCAT(`glpi_softwareversions`.`name`, ' - ',
                                                  `glpi_softwareversions`.`comment`
                                                  ) SEPARATOR '<br>')
                                 AS `ITEM_7`,
                     `glpi_softwares`.`comment` AS `ITEM_8`,   GROUP_CONCAT(DISTINCT CONCAT(IFNULL(`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`name`, '__NULL__'),
                                               '$#$',`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`id`) SEPARATOR '$$##$$')
                              AS `ITEM_9`,

                   GROUP_CONCAT(DISTINCT CONCAT(IFNULL(`glpi_softwarelicensetypes_49e04ae6e7121e1bcbad9cc6b8df630b`.`name`, '__NULL__'),
                                               '$#$',`glpi_softwarelicensetypes_49e04ae6e7121e1bcbad9cc6b8df630b`.`id`) SEPARATOR '$$##$$')
                              AS `ITEM_10`,

                  `glpi_locations`.`completename` AS `ITEM_11`,   GROUP_CONCAT(DISTINCT CONCAT(IFNULL(`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`expire`, '__NULL__'),
                                               '$#$',`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`id`) SEPARATOR '$$##$$')
                              AS `ITEM_12` FROM `glpi_softwares`LEFT JOIN `glpi_entities`
                                          ON (`glpi_softwares`.`entities_id` = `glpi_entities`.`id`
                                              )LEFT JOIN `glpi_manufacturers`
                                          ON (`glpi_softwares`.`manufacturers_id` = `glpi_manufacturers`.`id`
                                              ) LEFT JOIN `glpi_softwareversions`
                                             ON (`glpi_softwares`.`id` = `glpi_softwareversions`.`softwares_id`
                                                 )LEFT JOIN `glpi_operatingsystems`  AS `glpi_operatingsystems_0a35c270152be19b5c8a485502badcd7`
                                          ON (`glpi_softwareversions`.`operatingsystems_id` = `glpi_operatingsystems_0a35c270152be19b5c8a485502badcd7`.`id`
                                              ) LEFT JOIN `glpi_computers_softwareversions`  AS `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`
                                             ON (`glpi_softwareversions`.`id` = `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`.`softwareversions_id`
                                                 AND `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`.`is_deleted_computer` = 0
                                                          AND `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`.`is_deleted` = 0
                                                          AND `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`.`is_template_computer` = 0
                                                          AND ( `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`.`entities_id` IN ('0')  )  ) LEFT JOIN `glpi_softwarelicenses`  AS `glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`
                                             ON (`glpi_softwares`.`id` = `glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`softwares_id`
                                                  AND ( `glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`entities_id` IN ('0')  )  AND (`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`expire` IS NULL
                                                   OR `glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`expire` > NOW()) )LEFT JOIN `glpi_softwarelicensetypes`  AS `glpi_softwarelicensetypes_49e04ae6e7121e1bcbad9cc6b8df630b`
                                          ON (`glpi_softwarelicenses_bc40ab1c40f32a566b7d7743d5ca9e62`.`softwarelicensetypes_id` = `glpi_softwarelicensetypes_49e04ae6e7121e1bcbad9cc6b8df630b`.`id`
                                              )LEFT JOIN `glpi_locations`
                                          ON (`glpi_softwares`.`locations_id` = `glpi_locations`.`id`
                                              ) 
left join `glpi_computers`
on (`glpi_computers`.`id` = `glpi_computers_softwareversions_a5eff59bf6dbfb3b0a99ab6a2c9cff63`.`computers_id`)
WHERE  `glpi_softwares`.`is_deleted` = 0  AND `glpi_softwares`.`is_template` = 0  AND  ( `glpi_softwares`.`entities_id` IN ('0')  ) and `glpi_computers`.`groups_id` = '".$i."'  GROUP BY `glpi_softwares`.`id` ORDER BY ITEM_0 ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sql = "INSERT INTO dump_soft (no,groups_id,ITEM_0,ITEM_0_id,ITEM_1,ITEM_2,ITEM_3,ITEM_4,ITEM_5,ITEM_6,ITEM_6_min,ITEM_7,ITEM_8,ITEM_9,ITEM_10,ITEM_11,ITEM_12)
VALUES ('".$row['id']."', '".$row['groups_id']."', '".$row['ITEM_0']."', '".$row['ITEM_0_id']."', '".$row['ITEM_1']."', '".$row['ITEM_2']."', '".$row['ITEM_3']."', '".$row['ITEM_4']."', '".$row['ITEM_5']."', '".$row['ITEM_6']."', '".$row['ITEM_6_min']."', '".$row['ITEM_7']."', '".$row['ITEM_8']."', '".$row['ITEM_9']."', '".$row['ITEM_10']."', '".$row['ITEM_11']."', '".$row['ITEM_12']."')";
        if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    }
} else {
    echo "0 results";
}
}
//print_r ($group);
$conn->close();
?>