<?php

function xrange() {
	for ($i = 1; $i <= 10; $i += 1) {
		yield $i;
	}
}
foreach(xrange() as $v) {
	echo $v . "<br>";
}