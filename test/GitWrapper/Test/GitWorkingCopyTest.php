        $this->wrapper->init(self::REPO_DIR, array('bare' => true));
        $git = $this->wrapper->clone('file://' . realpath(self::REPO_DIR), $directory);
        $this->filesystem->touch($directory . '/move.me');
        $this->filesystem->mkdir($directory . '/a.directory', 0755);
        $this->filesystem->touch($directory . '/a.directory/remove.me');
        $this->filesystem->remove($directory);
        $this->filesystem->remove(self::REPO_DIR);
            $this->filesystem->remove(self::WORKING_DIR);
     * @return \GitWrapper\GitWorkingCopy
        $git = $this->wrapper->workingCopy($directory);
        $allBranches = 0;
            $allBranches++;
        $this->assertEquals($allBranches, 4);
        $remoteBranches = $branches->remote();
        $this->assertEquals(count($remoteBranches), 3);
        $this->filesystem->touch(self::WORKING_DIR . '/add.me');
    public function testGitApply()
    {
        $git = $this->getWorkingCopy();

        $patch = <<<PATCH
diff --git a/FileCreatedByPatch.txt b/FileCreatedByPatch.txt
new file mode 100644
index 0000000..dfe437b
--- /dev/null
+++ b/FileCreatedByPatch.txt
@@ -0,0 +1 @@
+contents

PATCH;
        file_put_contents(self::WORKING_DIR . '/patch.txt', $patch);
        $git->apply('patch.txt');
        $this->assertRegExp('@\?\?\\s+FileCreatedByPatch\\.txt@s', $git->getStatus());
        $this->assertEquals("contents\n", file_get_contents(self::WORKING_DIR . '/FileCreatedByPatch.txt'));
    }

        $branchName = $this->randomString();
        $git->branch($branchName);
        $this->assertTrue(strpos($branches, $branchName) !== false);
    public function testGitClean()
    {
        $git = $this->getWorkingCopy();

        file_put_contents(self::WORKING_DIR . '/untracked.file', "untracked\n");

        $result = $git
            ->clean('-d', '-f')
        ;

        $this->assertSame($git, $result);
        $this->assertFileNotExists(self::WORKING_DIR . '/untracked.file');
    }

        $expectedType = Process::OUT;
        $this->assertEquals($expectedType, $event->getType());
        $stdoutSuppress = stream_filter_append(STDOUT, 'suppress');
        stream_filter_remove($stdoutSuppress);