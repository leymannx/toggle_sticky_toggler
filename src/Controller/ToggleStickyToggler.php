<?php

namespace Drupal\toggle_sticky_toggler\Controller;

use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Url;

class ToggleStickyToggler {

  /**
   * @param \Drupal\node\NodeInterface $node
   *
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function toggleStickyStatus(NodeInterface $node) {

    $node->setSticky(!$node->isSticky());
    $node->save();

    $redirectUrl = Url::fromUri(\Drupal::request()->server
      ->get('HTTP_REFERER'), ['absolute' => TRUE])->getUri();

    return new RedirectResponse($redirectUrl);
  }

}
