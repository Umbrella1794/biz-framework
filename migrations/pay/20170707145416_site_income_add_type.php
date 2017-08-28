<?php

use Phpmig\Migration\Migration;

class SiteIncomeAddType extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $biz = $this->getContainer();
        $db = $biz['db'];
        if (!$this->isFieldExist('biz_site_income', 'type')) {
            $db->exec(
                "ALTER TABLE `biz_site_income` Add column `type` enum('inflow','outflow') NOT NULL COMMENT '流水类型';"
            );
        }
    }

    protected function isFieldExist($table, $filedName)
    {
        $biz = $this->getContainer();
        $db = $biz['db'];

        $sql = "DESCRIBE `{$table}` `{$filedName}`;";
        $result = $db->fetchAssoc($sql);

        return empty($result) ? false : true;
    }

    /**
     * Undo the migration
     */
    public function down()
    {

    }
}
