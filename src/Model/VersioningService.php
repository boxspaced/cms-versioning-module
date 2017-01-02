<?php
namespace Versioning\Model;

use DateTime;
use Account\Model\User;

class VersioningService
{

    /**
     * @param VersionableInterface $draft
     * @param User $user
     * @return void
     */
    public function createDraft(
        VersionableInterface $draft,
        User $user
    )
    {
        $draft->setStatus($draft::STATUS_DRAFT);
        $draft->setAuthor($user);
        $draft->setAuthoredTime(new DateTime());
    }

    /**
     * @param VersionableInterface $revision
     * @param VersionableInterface $published
     * @param User $user
     * @return void
     */
    public function createRevision(
        VersionableInterface $revision,
        VersionableInterface $published,
        User $user
    )
    {
        $revision->setVersionOf($published);
        $revision->setStatus($revision::STATUS_REVISION);
        $revision->setAuthor($user);
        $revision->setAuthoredTime(new DateTime());
    }

    /**
     * @param VersionableInterface $draft
     * @return void
     */
    public function publishDraft(VersionableInterface $draft)
    {
        $draft->setStatus($draft::STATUS_PUBLISHED);
        $draft->setPublishedTime(new DateTime());
    }

    /**
     * @param VersionableInterface $revision
     * @return void
     */
    public function publishRevision(VersionableInterface $revision)
    {
        $published = $revision->getVersionOf();

        $publishedTransferValues = $published->getVersioningTransferValues();
        $revisionTransferValues = $revision->getVersioningTransferValues();

        $published->setVersioningTransferValues($revisionTransferValues);
        $published->setLastModifiedTime(new DateTime());

        $revision->setVersioningTransferValues($publishedTransferValues);
        $revision->setStatus($revision::STATUS_ROLLBACK);
        $revision->setAuthor(null);
        $revision->setAuthoredTime(null);
        $revision->setRollbackStopPoint(new DateTime());
    }

    /**
     * @param VersionableInterface $published
     * @return void
     */
    public function deletePublished(VersionableInterface $published)
    {
        $published->setStatus($published::STATUS_DELETED);
        $published->setLastModifiedTime(new DateTime());
        $published->setPublishedTime(null);
    }

    /**
     * @param VersionableInterface $rollback
     * @return void
     */
    public function restoreRollback(VersionableInterface $rollback)
    {

    }

    /**
     * @param VersionableInterface $deleted
     * @return void
     */
    public function restoreDeleted(VersionableInterface $deleted)
    {

    }

}
