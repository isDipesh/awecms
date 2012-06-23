<?php if (count($comments) > 0): ?>
    <ul class="comments-list">
        <?php foreach ($comments as $comment): ?>
            <li id="comment-<?php echo $comment->id; ?>">
                <div class="comment">
                    <div class="gravatar">
                        <?php
                        if ($this->useGravatar) {
                            $this->widget('ext.YiiGravatar', array(
                                'email' => $comment->email,
                                'size' => 80,
                                //'defaultImage' => 'http://www.amsn-project.net/images/download-linux.png',
                                'secure' => false,
                                'rating' => 'r',
                                'emailHashed' => false,
                                'htmlOptions' => array(
                                    'alt' => 'Gravatar for ' . $comment->user_name,
                                    'alt' => 'Gravatar for ' . $comment->user_name,
                                )
                            ));
                        }
                        ?>
                    </div>
                    <div class="comment-header">
                        <?php echo $comment->username; ?>
                        <a name="comment-<?php echo $comment->count; ?>">
                            <?php echo Yii::app()->dateFormatter->formatDateTime($comment->create_time); ?>
                        </a>
                    </div>

                    <div class="comment_text">
                        <?php echo CHtml::encode($comment->comment_text); ?>
                    </div>
                    <div class="comment-footer">
                        <?php
                        if ($this->allowSubcommenting && (!$this->registeredOnly || !Yii::app()->user->isGuest)) {
                            echo CHtml::link(Yii::t('CommentsModule.msg', 'Reply'), '#', array('rel' => $comment->id, 'class' => 'add-comment'));
                        }
                        ?>
                        <?php if ($this->adminMode): ?>
                            <div class="admin-panel">
                                <?php
                                if ($comment->status != Comment::STATUS_APPROVED)
                                    echo CHtml::link(Yii::t('CommentsModule.msg', 'Approve'), Yii::app()->urlManager->createUrl(
                                                    CommentsModule::APPROVE_ACTION_ROUTE, array('id' => $comment->id)
                                            ), array('class' => 'approve'));
                                ?>
                                <?php
                                echo CHtml::link(Yii::t('CommentsModule.msg', 'Delete'), Yii::app()->urlManager->createUrl(
                                                CommentsModule::DELETE_ACTION_ROUTE, array('id' => $comment->id)
                                        ), array('class' => 'delete'));
                                ?>
                            </div>
                        
                    <?php endif; ?>
                        </div>
                </div>
                <?php if (count($comment->childs) > 0 && $this->allowSubcommenting) $this->render('ECommentsWidgetComments', array('comments' => $comment->childs)); ?>

            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p><?php echo Yii::t('CommentsModule.msg', 'No comments'); ?></p>
<?php endif; ?>