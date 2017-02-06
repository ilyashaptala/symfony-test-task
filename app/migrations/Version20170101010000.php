<?php

namespace App\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20170101010000 extends AbstractMigration
{

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('app_users');

        $table->addColumn('id', 'integer', ['autoincrement' => true, 'unsigned' => true]);
        $table->addColumn('username', 'string', ['length' => 64]);
        $table->addColumn('password', 'string', ['length' => 255]);
        $table->addColumn('salt', 'string', ['length' => 64]);

        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['username']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('app_users');
    }

}
