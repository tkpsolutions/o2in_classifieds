<?php
class Wallet {
    private $id;
    private $userId;
    private $deposit;
    private $used;
    private $refund;
    private $gift;
    private $actionDateTime;
    private $reference;
    private $remarks;
    private $status;
    // Linkage variable
    private $user;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getDeposit() {
        return $this->deposit;
    }

    public function setDeposit($deposit) {
        $this->deposit = $deposit;
    }

    public function getUsed() {
        return $this->used;
    }

    public function setUsed($used) {
        $this->used = $used;
    }

    public function getRefund() {
        return $this->refund;
    }

    public function setRefund($refund) {
        $this->refund = $refund;
    }

    public function getGift() {
        return $this->gift;
    }

    public function setGift($gift) {
        $this->gift = $gift;
    }

    public function getActionDateTime() {
        return $this->actionDateTime;
    }

    public function setActionDateTime($actionDateTime) {
        $this->actionDateTime = $actionDateTime;
    }

    public function getReference() {
        return $this->reference;
    }

    public function setReference($reference) {
        $this->reference = $reference;
    }

    public function getRemarks() {
        return $this->remarks;
    }

    public function setRemarks($remarks) {
        $this->remarks = $remarks;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function __construct($id, $userId, $deposit, $used, $refund, $gift, $actionDateTime, $reference, $remarks, $status) {
        $this->id = $id;
        $this->userId = $userId;
        $this->deposit = $deposit;
        $this->used = $used;
        $this->refund = $refund;
        $this->gift = $gift;
        $this->actionDateTime = $actionDateTime;
        $this->reference = $reference;
        $this->remarks = $remarks;
        $this->status = $status;
    }
}
?>
