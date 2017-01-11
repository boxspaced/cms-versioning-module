<?php
namespace Boxspaced\CmsVersioningModule\Model;

use DateTime;
use Boxspaced\CmsAccountModule\Model\User;

interface VersionableInterface
{

    const STATUS_DRAFT = 'DRAFT';
    const STATUS_PUBLISHED = 'PUBLISHED';
    const STATUS_REVISION = 'REVISION';
    const STATUS_ROLLBACK = 'ROLLBACK';
    const STATUS_DELETED = 'DELETED';

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param string $status
     * @return VersionableInterface
     */
    public function setStatus($status);

    /**
     * @return VersionableInterface
     */
    public function getVersionOf();

    /**
     * @param VersionableInterface $versionOf
     * @return VersionableInterface
     */
    public function setVersionOf(VersionableInterface $versionOf = null);

    /**
     * @return array
     */
    public function getVersioningTransferValues();

    /**
     * @param array $values
     * @return VersionableInterface
     */
    public function setVersioningTransferValues(array $values);

    /**
     * @param User $author
     * @return VersionableInterface
     */
    public function setAuthor(User $author = null);

    /**
     * @param DateTime $authoredTime
     * @return VersionableInterface
     */
    public function setAuthoredTime(DateTime $authoredTime = null);

    /**
     * @param DateTime $publishedTime
     * @return VersionableInterface
     */
    public function setPublishedTime(DateTime $publishedTime = null);

    /**
     * @param DateTime $lastModifiedTime
     * @return VersionableInterface
     */
    public function setLastModifiedTime(DateTime $lastModifiedTime = null);

    /**
     * @param DateTime $rollbackStopPoint
     * @return VersionableInterface
     */
    public function setRollbackStopPoint(DateTime $rollbackStopPoint = null);

}
