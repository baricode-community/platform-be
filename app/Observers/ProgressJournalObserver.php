<?php

namespace App\Observers;

use App\Models\ProgressJournal;

class ProgressJournalObserver
{
    /**
     * Handle the ProgressJournal "created" event.
     */
    public function created(ProgressJournal $progressJournal): void
    {
        $progressJournal->timeline->updateProgressFromJournals();
    }

    /**
     * Handle the ProgressJournal "updated" event.
     */
    public function updated(ProgressJournal $progressJournal): void
    {
        $progressJournal->timeline->updateProgressFromJournals();
    }

    /**
     * Handle the ProgressJournal "deleted" event.
     */
    public function deleted(ProgressJournal $progressJournal): void
    {
        $progressJournal->timeline->updateProgressFromJournals();
    }

    /**
     * Handle the ProgressJournal "restored" event.
     */
    public function restored(ProgressJournal $progressJournal): void
    {
        $progressJournal->timeline->updateProgressFromJournals();
    }

    /**
     * Handle the ProgressJournal "force deleted" event.
     */
    public function forceDeleted(ProgressJournal $progressJournal): void
    {
        $progressJournal->timeline->updateProgressFromJournals();
    }
}
