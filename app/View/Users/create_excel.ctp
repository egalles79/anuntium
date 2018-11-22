<?php
foreach ($data as $row):
	foreach ($row as &$cell):
		// Escape double quotation marks
		$cell = '"' . preg_replace('/"/','""',$cell) . '"';
	endforeach;
	echo implode(',', $row) . "\n";
endforeach;