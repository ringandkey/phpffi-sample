<?php

$row_size = $_GET["row"];
$column_size = $_GET["column"];

$dtl = FFI::cdef(
   "const char* gen_maze(char* work, int column_size, int row_size);",
   "./lib/libdtlffi.so"
);
$work= FFI::new("char[".($row_size*$column_size)."]");

echo json_encode([
   "maze" => $dtl->gen_maze($work,$column_size, $row_size),
   "column" => $column_size,
   "row" => $row_size,
   "chip" => ["w"=>20, "h"=>20],
   "ofst" => ["x"=>10, "y"=>10]
]);
