# Variables
PHP = php
ARTISAN = $(PHP) artisan
COMPOSER = composer
DB_FILE = database/database.sqlite

# Extensiones necesarias para Laravel
REQUIRED_EXTENSIONS = bcmath ctype fileinfo json mbstring openssl pdo tokenizer xml sqlite3

.PHONY: check-system install setup db run all

all: check-system setup db ## Ejecuta el flujo completo de instalación

check-system: ## Valida si las extensiones de PHP necesarias están instaladas
	@echo "Verificando dependencias del sistema..."
	@$(foreach ext,$(REQUIRED_EXTENSIONS), \
		$(PHP) -m | grep -qi $(ext) || (echo "Error: Falta la extensión PHP: $(ext)"; exit 1); \
	)
	@echo "Sistema validado correctamente."

install: ## Instala dependencias de Composer (ignora restricciones de plataforma si faltan extensiones menores)
	@echo "Instalando dependencias de PHP..."
	$(COMPOSER) install --optimize-autoloader --no-interaction

setup: ## Configura .env y App Key
	@echo "Configurando entorno..."
	@if [ ! -f .env ]; then \
		cp .env.example .env; \
		echo ".env creado desde el ejemplo."; \
	else \
		echo ".env ya existe."; \
	fi
	$(ARTISAN) key:generate --force

db: ## Crea la BD SQLite y ejecuta migraciones/seeders
	@echo "Preparando base de datos..."
	@mkdir -p database
	@touch $(DB_FILE)
	@# Forzamos la conexión a sqlite para este comando independientemente del .env
	DB_CONNECTION=sqlite DB_DATABASE=$(shell pwd)/$(DB_FILE) $(ARTISAN) migrate:fresh --seed --force