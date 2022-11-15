<?php if ($task['owner_ms'] > 0 && count($this->task->multiselectMemberModel->getMembers($task['owner_ms'])) > 0) : ?>
    <?= $this->helper->sizeAvatarHelperExtend->sizeMultiple($task['owner_ms'], 'avatar-inline avatar-bdyn', 20) ?>
<?php endif ?>
