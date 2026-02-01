{ pkgs, ... }: {
  channel = "stable-24.11"; 

  packages = [
    pkgs.php83                
    pkgs.php83Packages.composer
    pkgs.nodejs_22            
    pkgs.typescript
    pkgs.sqlite               
    pkgs.docker
    pkgs.docker-compose
  ];

  env = {
    DB_CONNECTION = "sqlite";
    DB_DATABASE = "database/database.sqlite";
  };

  idx = {
    extensions = [
        "onecentlin.laravel-blade"
        "amiralizadeh9480.laravel-extra-intellisense"
        "shufo.vscode-blade-formatter"
        "bmewburn.vscode-intelephense-client"
    ];
    
    previews = {
      enable = true;
      previews = {
        web = {
          command = ["php" "artisan" "serve" "--port" "$PORT" "--host" "0.0.0.0"];
          manager = "web";
        };
      };
    };

    workspace = {
      onCreate = {
        setup = ''
          composer install
          npm install
          cp .env.example .env
          php artisan key:generate
          mkdir -p database
          touch database/database.sqlite
          php artisan migrate --seed
        '';
      };
      onStart = {
        watch-frontend = "npm run dev";
      };
    };
  };
}
