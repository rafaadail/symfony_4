<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYoDxDxQ\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYoDxDxQ/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerYoDxDxQ.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerYoDxDxQ\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerYoDxDxQ\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'YoDxDxQ',
    'container.build_id' => '61291c66',
    'container.build_time' => 1528992447,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerYoDxDxQ');
