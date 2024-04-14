{ pkgs }: {
	deps = [
    		pkgs.sqlite.bin
    		pkgs.php80Packages.composer
		pkgs.php82
	];
}
