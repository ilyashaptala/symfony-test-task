<?php

namespace App\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20170103010000 extends AbstractMigration
{

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('app_search_history');

        $table->addColumn('id', 'integer', ['autoincrement' => true, 'unsigned' => true]);
        $table->addColumn('user_id', 'integer', ['unsigned' => true]);
        $table->addColumn('conditions', 'text', ['comment' => '(DC2Type:json_array)']);
        $table->addColumn('created_at', 'datetime');

        $table->setPrimaryKey(['id']);
        $table->addIndex(['user_id'], 'user_idx');

        $table->addForeignKeyConstraint('app_users', ['user_id'], ['id'], ['onDelete' => 'CASCADE']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('app_search_history');
    }
}
