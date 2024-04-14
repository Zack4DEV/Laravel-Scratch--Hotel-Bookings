{ pkgs }: {
	deps = [
    pkgs.sqlite.bin
		pkgs.nodejs-18_x
   	pkgs.php82Packages.composer
		pkgs.php82
	];
}