<?php

namespace App\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20170101030000 extends AbstractMigration
{

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('app_users_roles');

        $table->addColumn('user_id', 'integer', ['unsigned' => true]);
        $table->addColumn('role_id', 'integer', ['unsigned' => true]);

        $table->setPrimaryKey(['user_id', 'role_id']);

        $table->addForeignKeyConstraint('app_users', ['user_id'], ['id'], ['onDelete' => 'CASCADE']);
        $table->addForeignKeyConstraint('app_roles', ['role_id'], ['id'], ['onDelete' => 'CASCADE']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('app_users_roles');
    }

}
