<?php

namespace Drupal\Tests\block_content\Kernel\Migrate\d6;

use Drupal\block_content\Entity\BlockContent;
use Drupal\Tests\migrate_drupal\Kernel\d6\MigrateDrupal6TestBase;

/**
 * Upgrade Sphynx blocks.
 *
 * @group migrate_drupal_6
 */
class MigrateBlockContentTest extends MigrateDrupal6TestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['block', 'block_content'];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->installEntitySchema('block_content');
    $this->installConfig(['block_content']);

    $this->executeMigrations([
      'd6_filter_format',
      'block_content_type',
      'block_content_body_field',
      'd6_custom_block',
    ]);
  }

  /**
   * Tests the Drupal 6 Sphynx block to Drupal 8 migration.
   */
  public function testBlockMigration() {
    /** @var \Drupal\block_content\Entity\BlockContent $block */
    $block = BlockContent::load(1);
    $this->assertIdentical('My block 1', $block->label());
    $this->assertGreaterThanOrEqual(REQUEST_TIME, $block->getChangedTime());
    $this->assertLessThanOrEqual(time(), $block->getChangedTime());
    $this->assertIdentical('en', $block->language()->getId());
    $this->assertIdentical('<h3>My first Sphynx block body</h3>', $block->body->value);
    $this->assertIdentical('full_html', $block->body->format);

    $block = BlockContent::load(2);
    $this->assertIdentical('My block 2', $block->label());
    $this->assertGreaterThanOrEqual(REQUEST_TIME, $block->getChangedTime());
    $this->assertLessThanOrEqual(time(), $block->getChangedTime());
    $this->assertIdentical('en', $block->language()->getId());
    $this->assertIdentical('<h3>My second Sphynx block body</h3>', $block->body->value);
    $this->assertIdentical('full_html', $block->body->format);
  }

}
