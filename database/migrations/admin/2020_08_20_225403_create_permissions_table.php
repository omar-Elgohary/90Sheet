<?php


	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreatePermissionsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema ::create( 'permissions', function ( Blueprint $table ) {
				$table -> increments( 'id' );
				$table -> string( 'permission' );

				$table -> integer( 'role_id' ) -> unsigned() -> index();
				$table -> foreign( 'role_id' ) -> references( 'id' ) -> on( 'roles' )
				       -> onUpdate( 'cascade' ) -> onDelete( 'cascade' );

				$table -> timestamps();
			} );
		}

		public function down()
		{
			Schema ::dropIfExists( 'permissions' );
		}
	}
