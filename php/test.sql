SELECT d.id, d.name
FROM dogs d
    INNER JOIN dogsusers du ON d.id = du.dog_id
WHERE du.user_id = :id;

SELECT d.id, d.name
FROM dogs d
    INNER JOIN users u ON d.user_id = u.id
WHERE u.id = :id