<?php 

declare(strict_types = 1);

namespace Src\Infrastructure\Repository\Article;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Article\Article;

final readonly class ArticleRepository extends PDOManager implements ArticleRepositoryInterface {

    public function find(int $id): ?Article
    {
        $query = "SELECT * FROM article WHERE id = :id AND deleted = 0";

        $parameters = [
            "id" => $id
        ];

        $result = $this->execute($query, $parameters);
        
        return $this->primitiveToArticle($result[0] ?? null);
    }

    public function search(): array
    {
        $query = "SELECT * FROM article WHERE deleted = 0";
        $results = $this->execute($query);

        $articleResults = [];
        foreach ($results as $result) {
            $articleResults[] = $this->primitiveToArticle($result);
        }

        return $articleResults;
    }

    public function insert(Article $article): void
    {
        $query = "INSERT INTO article (name, code, deleted) VALUES (:name, :code, :deleted) ";

        $parameters = [
            "name" => $article->name(),
            "code" => $article->code(),
            "deleted" => $article->isDeleted()
        ];

        $this->execute($query, $parameters);
    }

    public function update(Article $article): void
    {
        $query = <<<UPDATE_QUERY
                        UPDATE
                            article
                        SET
                            name = :name,
                            code = :code,
                            deleted = :deleted
                        WHERE
                            id = :id
                    UPDATE_QUERY;

        $parameters = [
            "name" => $article->name(),
            "code" => $article->code(),
            "deleted" => $article->isDeleted(),
            "id" => $article->id()
        ];

        $this->execute($query, $parameters);
    }

    private function primitiveToArticle(?array $primitive): ?Article
    {
        if ($primitive === null) {
            return null;
        }

        return new Article(
            $primitive["id"],
            $primitive["name"],
            $primitive["code"],
            (bool) $primitive["deleted"]
        );
    }
}